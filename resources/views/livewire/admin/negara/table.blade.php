 <div class="row">
     <div class="col-12">
         <div class="card">
             <div class="card-header">
                 <h4>Table</h4>

                 <div class="card-header-action">
                     <a class="btn btn-primary" wire:click.prevent="$dispatch('showForm', { id: 0 })">New
                         <i class="fas fa-plus"></i>
                     </a>
                 </div>
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
                         <div class="form-group">
                             <div class="input-group">
                                 <input type="text" class="form-control" placeholder="Search" wire:model="query"
                                     wire:keyup="search">
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="table-responsive">
                     <table class="table-striped table">
                         <tr>
                             <th class="text-center">No</th>
                             <th>Flag</th>
                             <th>Nama</th>
                             <th>Action</th>
                         </tr>
                         @forelse ($data as $i => $v)
                             <tr>
                                 <td class="p-0 text-center">
                                     {{ $i + $data->firstItem() }}
                                 </td>
                                 <td><i class="flag-icon flag-icon-{{ $v->flag }}"></i></td>
                                 <td>
                                     {{ $v->nama }}
                                 </td>
                                 <td>
                                     <a class="btn btn-warning"
                                         wire:click.prevent="$dispatch('showForm', { id: {{ $v->id }} })">
                                         <i class="fas fa-edit"></i>
                                     </a>
                                     <a class="btn btn-danger"
                                         wire:click.prevent="$dispatch('show-delete', { id: {{ $v->id }} })">
                                         <i class="fas fa-trash"></i>
                                     </a>
                                 </td>
                             </tr>
                         @empty
                             <tr>
                                 <td colspan="4" class="text-center">Data tidak ditemukan</td>
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
