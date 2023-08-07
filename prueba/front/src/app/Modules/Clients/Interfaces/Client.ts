import { City } from "./City"
export interface Client{

    id : string
    nombre_cliente : string
    apellido_cliente : string
    cedula_cliente : string
    celular_cliente : string
    correo_cliente : string
    password_cliente : string
    ciudad_fk : number
    delete_sof : any
    cities: City

    
}

