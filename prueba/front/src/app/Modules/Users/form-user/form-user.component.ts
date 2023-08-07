import { Component } from '@angular/core';
import { UserService } from '../services/user.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { UserSelects } from '../interfaces/UserSelects';
import { ActivatedRoute, ParamMap,Router } from '@angular/router';
import { User } from '../interfaces/User';
import { PasswordValidate } from 'src/app/Global_Services/Security/PasswordValidate.service';
import { BaseComponentService } from 'src/app/Global_Services/base-component.service';
import { HttpClient } from '@angular/common/http';
@Component({
  selector: 'app-form-user',
  templateUrl: './form-user.component.html',
  styleUrls: ['./form-user.component.css']
})
export class FormUserComponent extends BaseComponentService<User, UserSelects> {
  user_form!: FormGroup;
  selects$! : UserSelects;

  constructor(
    private userServices : UserService, form_builder: FormBuilder, private route: ActivatedRoute,
    private router_: Router, private password_validate_: PasswordValidate, private http_ : HttpClient ){

      super(userServices, router_, password_validate_, http_)
      
      this.user_form = form_builder.group({
        nombre_usuario: ["", [Validators.required, Validators.maxLength(50)]],
        apellidos_usuario: ["", [Validators.required, Validators.maxLength(50)]],
        cedula_usuario: ["", [Validators.required, Validators.maxLength(11), Validators.minLength(5)]],
        celular_usuario: ["",[Validators.required, Validators.maxLength(11), Validators.minLength(9)]],
        correo_usuario: ["",[Validators.required, Validators.email]],
        password_usuario: ["",[Validators.required, Validators.minLength(2)]],
        password_confirm: ["",[Validators.required]],
        rol_fk: ["",[Validators.required]],
        status_fk: ["", [Validators.required]],
      })
  }

  ngOnInit(){

    //Se cargan los selects del formulario
    this.load_selects("user/selects")
      .subscribe((selects_ : UserSelects)=>{
        this.selects$ = selects_
      })
   
    //se inserta los parametros de ruta, accion del formulario y id de usuario
    this.route.paramMap.subscribe((params)=>{
      this._accion = params.get("accion")?.toLowerCase()
      this._model_id = params.get("id")?.toLowerCase()

    })
       
    //se realzia la peticion a la api para cargar cliente encontrado
    if(this.accion == "edit"){
      this.userServices.get_by_id().subscribe((user : User[])=>{

        user.forEach((user_: User)=>{
  
          this.user_form.patchValue({
            nombre_usuario: user_.nombre_usuario,
            apellidos_usuario: user_.apellidos_usuario,
            cedula_usuario: user_.cedula_usuario ,
            celular_usuario: user_.celular_usuario ,
            correo_usuario:user_. correo_usuario ,
            password_usuario: "",
            password_confirm: "" ,
            rol_fk:user_.rol_fk,
            status_fk: user_.status_fk
          })
        })
      })
    }
    this.load_model_edit("users/");
    
  }

  send(){
    
    let values = this.user_form.value
    delete values.password_confirm

    if(this.accion === "create"){
      console.log("aca")
      this.send_data(this.user_form, "users/update/", "home/users", this._model_id,"users/create",values)
    }

    if(this.accion == "edit"){

      this.send_data(this.user_form, "users/update/", "home/users", this._model_id,"users/create",values)
    }
    //se envian argumentos al metodo de la clase padre
   
  }

  validate(){

    this.validate_password(this.user_form.get("password_usuario")?.value, this.user_form.get("password_confirm")?.value)

  }

  validate_field(){

    let values = this.user_form.get("cedula_usuario")?.value
    this.check_field(values, "filter/users/","cedula_usuario")
  }
  ngOnDestroy(){

    this.accion = ""
  }

}




