import { Injectable } from '@angular/core';
import { CrudService } from './crud.service';
import { FormGroup} from '@angular/forms';
import { Router } from '@angular/router';
import { PasswordValidate } from './Security/PasswordValidate.service';
import { HttpClient } from '@angular/common/http';
import { Response } from '../Response/Response';

@Injectable()
export class BaseComponentService<Model, Select> {

  accion!:string;
  private model_id!: any;
  text_filter!: string;
  password_error!: boolean
  field_error: boolean = false
  model_form!: FormGroup;
  api_path:string = "http://127.0.0.1:8000/api/"
  selects! : Select;



  constructor(private modelService : CrudService<Model>,
    private router : Router, private password_validate: PasswordValidate, private http: HttpClient) {


   }

   set _accion(acc : any){

    this.accion = acc

   }

   set _model_id(id:any){

    this.model_id = id
   }
   load_data(route:string){

    this.modelService.load_data(route);

   }

   load_model_edit(route: string){

    if(this.accion == "edit"){

      this.modelService.load_model_id(route, this.model_id)

    }
   }

  send_data(data_form: FormGroup,route_edit: string,
            url_navigate: string, model_id: string = "", route_create:string, values : any){

      if(data_form.valid && this.password_error!== true && this.accion== "create"){
         this.modelService.create(route_create, data_form.value)
          .subscribe((res: Response)=>{

            if(res.status){
              this.router.navigate([url_navigate])
              console.log(res.message)
            }else{

              console.log("Error:"+ res.message)
              //retornaria un componente que muestre el error.
            }
          })
      }
      
      if(this.accion == "edit"){

        this.modelService.update(route_edit,this.model_id,data_form.value)
          .subscribe((res : Response)=>{
            if(res.status){
              this.router.navigate([url_navigate])
              console.log(res.message)
            }else{
              console.log("Error:"+ res.message)
            }
          })
        this.router.navigate([url_navigate])
      }
   }

   validate_password(pass_model : string, pass_in:string){

    this.password_error= this.password_validate.validate_equals(pass_in, pass_model)

   }

   check_field(check_field:any, route_api:string, column:string){
    const field = column
    this.field_error = false
    ///filter/clients/{colum}/{value}
    this.modelService.filter_model(route_api,column,check_field)
      .subscribe(model=>{
        console.log(model)
        model.forEach(model_=>{
          if(model_[field] == check_field){
            
            this.field_error = true;
            console.log(this.field_error)
          }
        })  
      })
   }

   load_selects(route:string){

    return this.http.get<Select>(this.api_path + route)
      
   }
}
