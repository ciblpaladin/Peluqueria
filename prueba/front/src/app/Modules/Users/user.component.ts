import { Component } from '@angular/core';
import { UserService } from './services/user.service';
import { User } from './interfaces/User';
import {Observable } from 'rxjs';
import { BaseListClassService } from 'src/app/Global_Services/Component-list/base-list-class.service';
@Component({
  selector: 'app-user',
  templateUrl: './user.component.html',
  styleUrls: ['./user.component.css']
})
export class UserComponent extends BaseListClassService<User>{

  public users$! : Observable<User[]>; 
  inputValue!: string;
  columValue: string = "default";
  current_page_ = 1;
  list_page = 25;

  constructor(private userService : UserService){

    super(userService,"users")
  }
  ngOnInit(){

    this.users$ = this.userService.all()

  }

  change_page(numberPagina: number): void {
    this.current_page_ = numberPagina;
  }

  delete(id : any){

    this.userService.delete("users/delete/",id)
    
  }
  
  onInputChange(){

    this.filter_table("filter/users/",this.columValue,this.inputValue)
    this.users$ = this.userService.all();

  }

  
}
