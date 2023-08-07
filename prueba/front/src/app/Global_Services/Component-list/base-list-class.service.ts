import { Injectable, Inject} from '@angular/core';
import { CrudService } from '../crud.service';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class BaseListClassService<Model> {


  constructor(private modelServices : CrudService<Model>,
    @Inject('model') private model: string
    ) { }


  
filter_table( route_api : string,colum : string, value: string){

  
  if(colum != "default" && value.length !== 0){

    this.modelServices.filter_table(route_api, colum,value)

  }
  if(value.length=== 0){

    this.modelServices.load_data(this.model
      )
  }
}
}
