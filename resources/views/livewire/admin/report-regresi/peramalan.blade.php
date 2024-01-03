 <div class="row">
     <div class="col-12">
         <div class="card">
             <div class="card-header">
                 <h4>Prediction</h4>
             </div>
             <div class="card-body">
                 <div class="card-sub">
                     <div class="btn-toolbar justify-content-between">
                         <div class="form-group">
                             <select class="form-control form-control-sm selectric" wire:model='perPage'
                                 wire:change="changePerPage($event.target.value)">
                                 @foreach ($perPageOptions as $option)
                                     <option value="{{ $option }}">{{ $option }}</option>
                                 @endforeach
                             </select>
                         </div>
                     </div>
                 </div>
                 <div class="table-responsive">
                     <table class="table-striped table">
                         <tr>
                             <th class="text-center">No</th>
                             <th>Negara</th>
                             <th>Ekonomi</th>
                             <th>Kesehatan</th>
                             <th>Kebebasan</th>
                             <th>Score</th>
                         </tr>
                         @php $i = 0; @endphp
                         @forelse ($data as $i => $v)
                             <tr>
                                 <td class="p-0 text-center">
                                     {{ $i++ + $data->firstItem() }}
                                 </td>
                                 <td>
                                     {{ $v['nama'] }}
                                 </td>
                                 <td>
                                     {{ $v['prediction_ekonomi'] }}
                                 </td>
                                 <td>
                                     {{ $v['prediction_kesehatan'] }}
                                 </td>
                                 <td>
                                     {{ $v['prediction_kebebasan'] }}
                                 </td>
                                 <td>
                                     {{ $v['prediction_score'] }}
                                 </td>
                             </tr>
                         @empty
                             <tr>
                                 <td colspan="5" class="text-center">Data tidak ditemukan</td>
                             </tr>
                         @endforelse
                     </table>
                 </div>
             </div>
             <div class="card-footer row align-items-center">
                 <div class="col-sm-12 col-md-5">
                     Showing {{ $data->firstItem() ?? 0 }} to {{ $data->lastItem() ?? 0 }} of {{ $data->total() }}
                     entries
                 </div>
                 <div class="col-sm-12 col-md-7 d-flex justify-content-end">
                     {{ $data->links() }}
                 </div>
             </div>
         </div>
     </div>
 </div>
