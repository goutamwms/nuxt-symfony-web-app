import { PUT } from "~/constants/http";
import type { Transaction } from "~/types/Transaction";
import useBasicError from "~/composables/useBasicError";

type TransactionLocation =  {
  location_name: string;
};
export default function useUpdateTransaction() {
  const { $appFetch } = useNuxtApp();
  const { setError, resetError, errorMessage, violations } = useBasicError();
  return {
    errorMessage,
    violations,
    async updateTransaction(transactionId: Number, transactionLocation: TransactionLocation) {
      
      try {
        resetError();
        const response = await $appFetch<Transaction>("/transactions/" + transactionId, {
          method: PUT,
          body: transactionLocation,
        });
        if (!response) {
          throw createError("Error while updating transaction");
        }
        return response;
      } catch (e: any) {
        setError(e);
        throw e;
      }
    },
  };
}
