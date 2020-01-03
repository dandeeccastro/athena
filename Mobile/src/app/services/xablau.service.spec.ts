import { TestBed } from '@angular/core/testing';

import { XablauService } from './xablau.service';

describe('XablauService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: XablauService = TestBed.get(XablauService);
    expect(service).toBeTruthy();
  });
});
