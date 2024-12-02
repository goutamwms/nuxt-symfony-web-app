import localeFr from "../../src/locales/fr";
import localeEn from "../../src/locales/en";
export default defineI18nConfig(() => ({
  legacy: false,
  locale: "en",
  messages: {
    en: localeEn,
    fr: localeFr,
  },
}));
