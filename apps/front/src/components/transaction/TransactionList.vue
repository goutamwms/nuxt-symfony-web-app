<template>
  <div class="p-card p-3">
    <LoadingIndicator
      v-if="transactionsPending"
      :is-loading="transactionsPending"
      :display-text="$t('components.transaction.list.pending')"
    />
    <div v-show="error">{{ error }}</div>
    <div class="mb-2">
        <InputText
          v-model="searchQuery"
          placeholder="Search Transaction"
        />
    </div>
    <table v-if="transactions?.data" class="w-full border-1 p-table p-component small-text"> 
      <thead>
        <tr>
          <th class="text-center">{{ $t("components.transaction.list.date_and_time") }}</th>
          <th class="text-right">{{ $t("components.transaction.list.amount") }}</th>
          <th class="text-center">{{ $t("components.transaction.list.payment_label") }}</th>
          <th class="text-center">{{ $t("components.transaction.list.localization") }}</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="transaction in transactions.data" :key="(transaction.id).toString()">
          <td class="text-center">{{ transaction.createdAt }}</td>
          <td class="text-right">{{ formatCurrency(transaction.amount, locale, currency) }}</td>
          <td class="text-center">{{ transaction.description }}</td>
          <td class="text-center">
            
            <template v-if="transaction.locationName">
              {{ transaction.locationName }}
            </template>
            <template v-else >
                <Button class="p-button-sm p-component" @click="openModal(transaction)">Identify the place</Button>
              </template>
          </td>
        </tr>
        <tr v-if="transactions.data.length == 0">
          <td class="text-center pt-5" colspan="4">No record found</td>
        </tr>
      </tbody>
    </table>

    <!-- pagination --> 
    <div class=" p-d-flex p-ai-center p-jc-between p-mt-5 text-right mt-3" v-if="transactions?.total_pages > 1">
      <Button label="Previous" class="p-button-sm p-button-secondary" :disabled="page === 1" @click="page--" />
      <span class="middle-text mb-4 px-2">Page {{ page }}</span>
      <Button label="Next" class="p-button-sm p-button-primary" @click="page++" :disabled="transactions.total_pages === 1 || transactions.total_pages === transactions.page" />
    </div>

    <!-- Modal dialog -->
    <Dialog v-model:visible="modalVisible"
      header="Nearby Places"
      :modal="true"
      :closable="false"
      class="p-fluid custom-dialog">
      <div>
        <ul>
          <li
            v-for="place in places"
            :key="place.id.toString()"
            @click="selectPlace(place)"
            class="p-mb-2 cursor-pointer"
          >
            {{ place.name }}
          </li>
        </ul>
        <div v-if="noPlaceFound" class="small-text mb-4">No places found</div>
      </div>
      <div class="p-d-flex p-jc-end p-mt-3">
        <Button label="Close" @click="modalVisible = false" />
      </div>
    </Dialog>

  </div>
</template>

<script setup lang="ts">
import { ref, computed, watch } from 'vue';
import type { Location } from "~/types/Transaction";
import { POST,PUT } from "~/constants/http";
import useAuthUser from "~/store/auth";
import { debounce, formatCurrency } from "~/utils/helper";
import  Dialog  from 'primevue/dialog';
import  InputText  from 'primevue/inputtext';
import  Button from 'primevue/button';
import LoadingIndicator from "../LoadingIndicator.vue";
import useListTransactions from "~/composables/api/transaction/useListTransactions";
import useUpdateTransaction from "~/composables/api/transaction/useUpdateTransaction";

const { $appFetch } = useNuxtApp();

const modalVisible = ref(false);
const places = ref<Location[]>([]);
const selectedTransaction = ref<number>(0);
const page = ref<number>(1);
const limit = ref<number>(10);
const searchQuery = ref<string>('');
const debouncedQuery = ref<string>('');
const noPlaceFound = ref<boolean>(false)
    
const {me} = useAuthUser();

const {
  data: transactions,
  error,
  pending: transactionsPending,
  refresh: transactionsRefresh,
} = await useListTransactions(me?.id as string, {page, limit, 'searchQuery':debouncedQuery});

watch([page, debouncedQuery], () => {
  transactionsRefresh();
});

const updateDebouncedQuery = debounce((query: string) => {
  debouncedQuery.value = query;
  page.value = 1;
}, 300); 

watch(searchQuery, (newQuery) => {
  updateDebouncedQuery(newQuery);
});

const locale = computed(() => me?.locale || 'en-US');
const currency = computed(() => me?.currency || 'USD');

const { updateTransaction: updateTransactionApi } = useUpdateTransaction();

const openModal = async (transaction:any) => {
  selectedTransaction.value = transaction.id;
  modalVisible.value = true;
  places.value = []
  noPlaceFound.value = false

  const { latitude, longitude } = transaction.location;
  const result = await $appFetch<Promise<Location[]>>(`/nearby-places`, {
      method: POST,
      body: {latitude,longitude},
    });
  places.value = result
  noPlaceFound.value = Array.isArray(result) && result.length === 0 ? true : false;
};

const selectPlace = async (place:Location) => {
  const body = {
    location_name: place.name,
  };
  await updateTransactionApi(selectedTransaction.value, body);
  
  modalVisible.value = false;
  transactionsRefresh()
};
</script>

<style scoped lang="scss">
.p-card {
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.p-table {
  width: 100%;
  border-collapse: collapse;
}

.p-table th, 
.p-table td {
  border: 1px solid #dcdcdc;
  padding: 10px;
  text-align: left;
}

.p-table th {
  background-color: #f4f4f4;
  font-weight: bold;
}

.small-text th, 
.small-text td {
  font-size: 0.675rem; 
}

.p-button {
  margin: 5px 0;
}

.middle-text {
  font-size: 0.675rem; 
  line-height: 1;     
  color: #555;        
  min-height: 100%;
}

.loading-container {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-color: #f9f9f9; 
  }
  
  .spinner {
    font-size: 2rem; 
    color: #007ad9; 
    margin-bottom: 10px; 
  }
  
  .loading-text {
    font-size: 1rem; 
    color: #555; 
    font-weight: 500;
  }
</style>
