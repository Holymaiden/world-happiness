 <div class="row">
     <div class="col-12">
         <div class="card">
             <div class="card-header">
                 <h4>Filter</h4>
             </div>
             <div class="card-body">
                 <div class="btn-toolbar justify-content-between">
                     <div class="form-group">
                         <select class="form-control form-control-sm selectric"
                             wire:change="changeDate($event.target.value)">
                             <option value="">Pilih Tahun Prediksi</option>
                             @foreach ($years as $v)
                                 <option value="{{ $v->tahun }}">{{ $v->tahun + 1 }}</option>
                             @endforeach
                         </select>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
