export type Location = {
  id: number;
  name: string;
  latitude:number;
  longitude:number;
}
export interface Transaction {
  id: number;
  amount: number;
  description: string;
  createdAt: Date;
  locationName:string;
  location: Location;
}
