// Define the custom debounce function
export function debounce(func: (...args: any[]) => void, delay: number) {
    let timer: ReturnType<typeof setTimeout> | null = null;
    return (...args: any[]) => {
      if (timer) clearTimeout(timer);
      timer = setTimeout(() => {
        func(...args);
      }, delay);
    };
  }

  // Define the formatCurrency function
  export function formatCurrency(price: number, locale: string, currency: string) {
    try {
      const formatter = new Intl.NumberFormat(locale, {
        style: 'currency',
        currency,
      });
      return formatter.format(price);
    } catch (error) {
      console.error('Error formatting currency:', error);
      return price;
    }
}