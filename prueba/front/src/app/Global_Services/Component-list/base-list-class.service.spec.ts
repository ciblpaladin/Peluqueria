import { TestBed } from '@angular/core/testing';

import { BaseListClassService } from './base-list-class.service';

describe('BaseListClassService', () => {
  let service: BaseListClassService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(BaseListClassService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
