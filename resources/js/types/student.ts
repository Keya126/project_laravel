
import {
  IUser
} from './user';

export interface IStudent {
  id: number;
  name: string;
  email: string;
  age: number;
  class: string;
  address: string;
  user_id: number;
  created_at: string;
  updated_at: string;
  user?: IUser;
}