export interface ILink {
  url: string;
  label: string;
  active: boolean;
}

export interface ITableResult<T> {
  data: T[];
  links: ILink[];
}
