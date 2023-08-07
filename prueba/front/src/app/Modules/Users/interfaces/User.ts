
import { Rol } from "./Rol";
import { Statu } from "./Statu";

export interface User{

    id : number;
    nombre_usuario: string;
    apellidos_usuario: string; 
    cedula_usuario: string;
    celular_usuario: string;
    correo_usuario: string;
    password_usuario: string;
    rol_fk: number;
    status_fk: number;
    delete_soft: number;
    rol : Rol;
    status : Statu;
    

}
