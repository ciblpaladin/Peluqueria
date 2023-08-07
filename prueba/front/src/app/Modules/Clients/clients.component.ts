import { Component } from '@angular/core';
import { ClientService } from './Services/client.service';
import { BehaviorSubject, Observable } from 'rxjs';
import { Client } from './Interfaces/Client';
import { BaseListClassService } from 'src/app/Global_Services/Component-list/base-list-class.service';

@Component({
  selector: 'app-clients',
  templateUrl: './clients.component.html',
  styleUrls: ['./clients.component.css']
})
export class ClientsComponent extends BaseListClassService<Client>{

  public clients$!: Observable<Client[]>
  inputValue!: string;
  columValue: string = "default";
  current_page_ = 1;
  list_page = 25;

  constructor(private clientService : ClientService){

    super(clientService, "clients")
    
  }
  ngOnInit(){

    
    this.clients$ = this.clientService.all()
    
  }

  onInputChange(){

    this.filter_table("filter/clients/",this.columValue,this.inputValue)
    this.clients$ = this.clientService.all();
  }

  setColumn(){

  }

  change_page(numberPagina: number): void {
    this.current_page_ = numberPagina;
  }

  delete(id : any){

    this.clientService.delete("clients/delete/",id)

  }
}
