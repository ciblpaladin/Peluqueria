import { Injectable } from '@angular/core';
import { CrudService } from 'src/app/Global_Services/crud.service';
import { HttpClient } from '@angular/common/http';
import { User } from '../interfaces/User';
import { UserSelects } from '../interfaces/UserSelects';
import { BehaviorSubject, Observable } from 'rxjs';
@Injectable({
  providedIn: 'root'
})
export class UserService extends CrudService<User> {
  
  private selects!: UserSelects;
  private selects$!: BehaviorSubject<UserSelects>;
  constructor(protected http_ : HttpClient) {

    super(http_,"users")
    this.load_data("users");
    this.load_selects("user/selects")
    this.selects$ = new BehaviorSubject<UserSelects>({Rol:[], Statu:[]})
   }


   load_selects(route: string){

    this.http_.get<UserSelects>(this.api_path + route)
      .subscribe((select: UserSelects)=>{
        this.selects = select
        this.selects$.next(this.selects);
      })
  }

  get_selects():Observable<UserSelects>{

    return this.selects$.asObservable();
    
  }

   
}
