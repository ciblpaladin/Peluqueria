import { Injectable } from '@angular/core';
import { CrudService } from 'src/app/Global_Services/crud.service';
import { Client } from '../Interfaces/Client';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ClientService extends CrudService<Client> {

  inputValue!: string;
  columValue: string = "default";
  current_page_ = 1;
  list_page = 25;
  
  constructor(protected http_: HttpClient) {
    super(http_,"clients")
    this.load_data("clients")
   }


   setColumn(){

   }
}
