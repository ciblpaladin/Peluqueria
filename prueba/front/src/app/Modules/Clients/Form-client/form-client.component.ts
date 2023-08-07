import { Component } from '@angular/core';
import { ClientService } from '../Services/client.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { PasswordValidate } from 'src/app/Global_Services/Security/PasswordValidate.service';
import { Router } from '@angular/router';
import { BaseComponentService } from 'src/app/Global_Services/base-component.service';
import { Client } from '../Interfaces/Client';
import { HttpClient } from '@angular/common/http';
import { ClienteSelect } from '../Interfaces/ClientSelects';
import { Observable } from 'rxjs';
@Component({
  selector: 'app-form-client',
  templateUrl: './form-client.component.html',
  styleUrls: ['./form-client.component.css']
})
export class FormClientComponent extends BaseComponentService<Client, ClienteSelect> {

  client_form :FormGroup;
  selects$! : ClienteSelect;
 

  constructor(
    private clientService : ClientService, form_builder: FormBuilder, private route: ActivatedRoute,
    private router_: Router, private password_validate_: PasswordValidate, private http_ : HttpClient){

      super(clientService, router_, password_validate_, http_)

    this.client_form = form_builder.group({
      nombre_cliente: ["", [Validators.required, Validators.maxLength(50)]],
      apellido_cliente: ["", [Validators.required, Validators.maxLength(50)]],
      cedula_cliente: ["", [Validators.required, Validators.maxLength(11), Validators.minLength(5)]],
      celular_cliente: ["",[Validators.required, Validators.maxLength(11), Validators.minLength(9)]],
      correo_cliente: ["",[Validators.required, Validators.email]],
      password_cliente: ["",[Validators.required, Validators.minLength(2)]],
      password_confirm: ["",[Validators.required]],
      ciudad_fk:["",[Validators.required]]

    })
  }


  ngOnInit(){

    //Se cargan los selects del formulario
    this.load_selects("client/selects")
      .subscribe((selects_ : ClienteSelect)=>{
        this.selects$ = selects_

      })

   
    //se inserta los parametros de ruta, accion del formulario y id de usuario
    this.route.paramMap.subscribe((params)=>{
      this._accion = params.get("accion")?.toLowerCase()
      this._model_id = params.get("id")?.toLowerCase()

    })
    
    
    //se realzia la peticion a la api para cargar cliente encontrado
    if(this.accion == "edit"){
      this.clientService.get_by_id().subscribe((client : Client[])=>{

        client.forEach((client_: Client)=>{
  
          this.client_form.patchValue({
            nombre_cliente: client_.nombre_cliente,
            apellido_cliente: client_.apellido_cliente,
            cedula_cliente: client_.cedula_cliente ,
            celular_cliente: client_.celular_cliente ,
            correo_cliente:client_. correo_cliente ,
            password_cliente: "",
            password_confirm: "" ,
            ciudad_fk:client_. ciudad_fk,
          })
        })
      })
    }
    this.load_model_edit("clients/");
    
  }

  send(){

    let values = this.client_form.value
    delete values.password_confirm
   
    //se envian argumentos al metodo de la clase padre
    this.send_data(this.client_form, "clients/update/", "clients", this._model_id,"clients/create",values)
  }

  validate(){

    this.validate_password(this.client_form.get("password_cliente")?.value, this.client_form.get("password_confirm")?.value)

  }

  validate_field(){

    let values = this.client_form.get("cedula_cliente")?.value
    this.check_field(values, "filter/clients/","cedula_cliente")
  }
  ngOnDestroy(){

    this.accion = ""
  }
}
