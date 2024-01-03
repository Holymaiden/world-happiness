 <div class="row">
     <div class="col-12">
         <div class="card">
             <div class="card-header">
                 <h4>Variabel</h4>
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
                             <th>X<sub>1</sub><sup>2</sup></th>
                             <th>X<sub>2</sub><sup>2</sup></th>
                             <th>X<sub>3</sub><sup>2</sup></th>
                             <th>Y<sup>2</sup></th>
                             <th>X<sub>1</sub>X<sub>2</sub></th>
                             <th>X<sub>1</sub>X<sub>3</sub></th>
                             <th>X<sub>2</sub>X<sub>3</sub></th>
                             <th>X<sub>1</sub>Y</th>
                             <th>X<sub>2</sub>Y</th>
                             <th>X<sub>3</sub>Y</th>
                         </tr>
                         @php $i = 0; @endphp
                         @forelse ($data as $v)
                             <tr>
                                 <td class="p-0 text-center">
                                     {{ $i++ + $data->firstItem() }}
                                 </td>
                                 <td>
                                     {{ $v['negara'] }}
                                 </td>
                                 <td>
                                     {{ $v['x1_2'] }}
                                 </td>
                                 <td>
                                     {{ $v['x2_2'] }}
                                 </td>
                                 <td>
                                     {{ $v['x3_2'] }}
                                 </td>
                                 <td>
                                     {{ $v['y_2'] }}
                                 </td>
                                 <td>
                                     {{ $v['x1x2'] }}
                                 </td>
                                 <td>
                                     {{ $v['x1x3'] }}
                                 </td>
                                 <td>
                                     {{ $v['x2x3'] }}
                                 </td>
                                 <td>
                                     {{ $v['x1y'] }}
                                 </td>
                                 <td>
                                     {{ $v['x2y'] }}
                                 </td>
                                 <td>
                                     {{ $v['x3y'] }}
                                 </td>
                             </tr>
                         @empty
                             <tr>
                                 <td colspan="11" class="text-center">Data tidak ditemukan</td>
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
