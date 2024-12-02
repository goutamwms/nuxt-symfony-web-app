import type { Transaction } from "~/types/Transaction";
import { GET } from "~/constants/http";
import useAppFetch from "~/composables/useAppFetch";

type TransactionsList = {
  data : Transaction[],
  total: number,
  page: number,
  limit: number,
  total_pages: number,
}

export default async function useListTransactions(userId: string, params : {}) {
  return useAppFetch<TransactionsList>(() => "/transactions/user/" + userId, {
    key: "user_transactions" + userId,
    method: GET,
    lazy: true,
    params
  });
}