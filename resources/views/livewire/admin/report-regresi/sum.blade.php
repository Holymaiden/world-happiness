 <div class="row">
     <div class="col-12">
         <div class="card">
             <div class="card-header">
                 <h4>SUM</h4>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table class="table-striped table">
                         <tr>
                             <th>Ekonomi (X<sub>1</sub>)</th>
                             <th>Kesehatan (X<sub>2</sub>)</th>
                             <th>Kebebasan (X<sub>3</sub>)</th>
                             <th>Score (Y)</th>
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
                         @if (count($data) > 0)
                             <tr>
                                 <td>
                                     {{ $data['x1'] }}
                                 </td>
                                 <td>
                                     {{ $data['x2'] }}
                                 </td>
                                 <td>
                                     {{ $data['x3'] }}
                                 </td>
                                 <td>
                                     {{ $data['y'] }}
                                 </td>
                                 <td>
                                     {{ $data['x1_2'] }}
                                 </td>
                                 <td>
                                     {{ $data['x2_2'] }}
                                 </td>
                                 <td>
                                     {{ $data['x3_2'] }}
                                 </td>
                                 <td>
                                     {{ $data['y_2'] }}
                                 </td>
                                 <td>
                                     {{ $data['x1x2'] }}
                                 </td>
                                 <td>
                                     {{ $data['x1x3'] }}
                                 </td>
                                 <td>
                                     {{ $data['x2x3'] }}
                                 </td>
                                 <td>
                                     {{ $data['x1y'] }}
                                 </td>
                                 <td>
                                     {{ $data['x2y'] }}
                                 </td>
                                 <td>
                                     {{ $data['x3y'] }}
                                 </td>
                             </tr>
                         @else
                             <tr>
                                 <td colspan="15" class="text-center">Data tidak ditemukan</td>
                             </tr>
                         @endif
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </div>
