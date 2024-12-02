import { POST } from "~/constants/http";
import type { User } from "~/types/User";
import useBasicError from "~/composables/useBasicError";

type UserInput = Omit<User, "id"> & {
  password: string;
};
export default function useCreateUser() {
  const { $appFetch } = useNuxtApp();

  const { setError, resetError, errorMessage, error, violations } =
    useBasicError();

  return {
    errorMessage,
    error,
    violations,
    async createUser(user: UserInput) {
      try {
        resetError();
        const response = await $appFetch<User>("/users", {
          method: POST,
          body: user,
        });
        if (!response) {
          throw createError("Error while registering user");
        }
        return response;
      } catch (e: any) {
        setError(e);
        throw e;
      }
    },
  };
}
