export type UserId = string;
export interface User {
  id: UserId;
  email: string;
  first_name: string;
  last_name: string;
  score: number;
  pending_transaction: number;
  locale: string,
  currency: string,
  isAdmin: boolean
}
