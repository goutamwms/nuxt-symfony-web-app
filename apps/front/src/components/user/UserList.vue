<template>
  <div>
    <div
      v-show="usersPending"
      v-t="{ path: 'components.user.list.pending' }"
    ></div>
    <div v-show="error">{{ error }}}</div>
    {{ errorDelete }}
    <table v-if="users" class="w-full border-1 p-table p-component small-text mt-3">
      <thead>
        <!--<tr>
          <th class="text-left">{{ $t("components.user.list.title") }}</th>
        </tr>-->
        <tr>
          <th class="text-center">{{ $t("components.user.list.email") }}</th>
          <th class="text-center">{{ $t("components.user.list.lastName") }}</th>
          <th class="text-center">{{ $t("components.user.list.firstName") }}</th>
          <th class="text-center">{{ $t("components.user.list.score") }}</th>
          <th class="text-center">{{ $t("components.user.list.pendingTransactions") }}</th>
          <th class="text-center" colspan="2">{{ $t("components.user.list.action") }}</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users" :key="user.id">
          <td class="text-center">{{ user.email }}</td>
          <td class="text-center">{{ user.last_name }}</td>
          <td class="text-center">{{ user.first_name }}</td>
          <td class="text-center">{{ user.score }}</td>
          <td class="text-center">{{ user.pending_transaction }}</td>
          <td>
            <NuxtLink
              v-if="!authStore.isAuthUser(user)"
              :to="`/users/${user.id}`"
            >
              <Button severity="secondary">{{
                $t("components.user.list.edit")
              }}</Button>
            </NuxtLink>
          </td>
          <td>
            <Button
              v-if="!authStore.isAuthUser(user)"
              severity="danger"
              @click="deleteUserClick(user)"
            >
              {{ $t("components.user.list.delete") }}
            </Button>
          </td>
        </tr>
      </tbody>
    </table>

  </div>
</template>

<script setup lang="ts">
import type { User } from "~/types/User";
import useAuthUser from "~/store/auth";
import useListUsers from "~/composables/api/user/useListUsers";
import useDeleteUser from "~/composables/api/user/useDeleteUser";

const authStore = useAuthUser();
const { deleteUser, errorMessage: errorDelete } = useDeleteUser();

const {
  data: users,
  error,
  pending: usersPending,
  refresh: usersRefresh,
} = await useListUsers();

const deleteUserClick = async (user: User) => {
  try {
    await deleteUser(user);
    usersRefresh();
  } catch (e) {
    logger.error(e);
    throw e;
  }
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

</style>
