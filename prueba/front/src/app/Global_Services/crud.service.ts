import { Injectable, Inject  } from '@angular/core';
import { BehaviorSubject, Observable, tap } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { Response } from '../Response/Response';

@Injectable()
export class CrudService<T> {

  public api_path = "http://127.0.0.1:8000/api/"
  private models$!: BehaviorSubject<T[]>;
  private models!: T[];
  private model_id! : T[];
  private model_id$!: BehaviorSubject<T[]>;
  private response! : Response;

  constructor(private http: HttpClient,  @Inject('model_table') private model_table: string) {

    this.models$ = new BehaviorSubject<T[]>([])
    this.model_id$ = new BehaviorSubject<T[]>([])
   }

  load_data(route : string){

    this.http.get<T[]>(this.api_path + route)
      .subscribe((models : T[])=>{
        this.models = models
        this.models$.next(this.models);

      })
  }

  all(): Observable<T[]>{
    
    return this.models$.asObservable();
  }

  load_model_id(route : string, id: any){

    this.http.get<T[]>(this.api_path + route + id)
      .subscribe((model : T[])=>{
        this.model_id = model;
        this.model_id$.next(this.model_id)
      })
  }

  get_by_id() : Observable<T[]>{

    return this.model_id$.asObservable();
  }

  create(route : string, data:any) : Observable<Response>{

   
    return this.http.post<Response>(this.api_path + route, data)
      .pipe(
          tap((res: Response)=>{

            this.load_data(this.model_table)
          })
      )

  }

  update(route : string, id:any , data:any) : Observable<Response>{

    return this.http.post<Response>(this.api_path+ route + id, data)
      .pipe(
        tap((res : Response)=>{

          this.load_data(this.model_table)

        })
      )
  }

  delete(route: string, id:any){

    this.http.post(this.api_path + route+ id, null)
    .subscribe((response)=>{
      console.log(response)
      this.load_data(this.model_table);
    })
  }

  filter_table(route:string, column:string, value : string){
    
    this.http.get<T[]>(this.api_path+ route+ column +"/"+ value)
      .subscribe((data)=>{
        this.models = data;
        this.models$.next(this.models);
      })
  }

  filter_model(route:string, column:string, value : string){

    return this.http.get<any[]>(this.api_path+ route+ column +"/"+ value);
      
  }



  
}
