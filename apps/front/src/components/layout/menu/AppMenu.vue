<template>
  <TieredMenu :model="items" class="h-screen sticky w-full">
    <template #item="{ label, item, props, hasSubmenu }">
      <NuxtLink v-if="item.route" v-slot="routerProps" :to="item.route" custom>
        <a
          :href="routerProps.href"
          v-bind="props.action"
          @click="routerProps.navigate"
        >
          <span v-bind="props.icon" />
          <span v-bind="props.label">{{ label }}</span>
        </a>
      </NuxtLink>
      <a v-else :href="item.url" :target="item.target" v-bind="props.action">
        <span v-bind="props.icon" />
        <span v-bind="props.label">{{ label }}</span>
        <span
          v-if="hasSubmenu"
          class="pi pi-fw pi-angle-right"
          v-bind="props.submenuicon"
        />
      </a>
    </template>
  </TieredMenu>
</template>
<script setup lang="ts">
import useAuthUser from "~/store/auth";
import type { User } from "~/types/User";

const { t } = useI18n();
const authStore = useAuthUser();
const { $appFetch } = useNuxtApp();

const baseMenu = [
  {
    label: t("components.layout.menu.appMenu.dashboard"),
    icon: "pi pi-fw pi-hashtag",
    route: "/",
  },
  {
    label: t("components.layout.menu.appMenu.transactions"),
    icon: "pi pi-fw pi-file",
    route: "/transactions",
  },
  {
    label: t("components.layout.menu.appMenu.page1"),
    icon: "pi pi-fw pi-pencil",
    route: "/demo/page1",
  },
  {
    label: t("components.layout.menu.appMenu.page2"),
    icon: "pi pi-fw pi-pencil",
    route: "/demo/page2",
  },
  {
    label: t("components.layout.menu.appMenu.validation"),
    icon: "pi pi-fw pi-id-card",
    route: "/demo/validation",
  },
];

const adminMenu = [
  {
    label: t("components.layout.menu.appMenu.users"),
    icon: "pi pi-fw pi-file",
    route: "/users",
  },
];

const menuItems = (authStore?.me as User).isAdmin ?  [...baseMenu, ...adminMenu] : baseMenu;
const items = computed(() => [
  ...menuItems,
  {
    separator: true,
  },
  {
    label: t("components.layout.menu.appMenu.quit"),
    icon: "pi pi-fw pi-power-off",
    command: async () => {
      await authStore.logoutUser($appFetch);
      await navigateTo("/", { external: true });
    },
  },
]);



</script>
