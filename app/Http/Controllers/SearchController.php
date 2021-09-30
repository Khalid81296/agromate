<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class SearchController extends Controller
{
   public function index()
{
    // dd(1);
return view('users.search');
}
public function search(Request $request)
{
if($request->ajax())
{
$output="";
$products=DB::table('users')->where('username','LIKE','%'.$request->search."%")->get();
// dd($products);
if($products)
{
foreach ($products as $key => $product) {
$output.='<tr>'.
// '<td>'.$product->id.'</td>'.
// '<td class="col-lg-3>'.$product->username.'</td>'.
// '<td>'.$product->email.'</td>'.
// '<td>'.$product->mobile_no.'</td>'.
'</tr>';
$output = "<div style='display: block;
    width: 432px;
    border: 1px solid;
    border-radius: 25px;
    text-align: center;
    '><p>".$product->email."</p></div>";
}
return Response($output);
   }
   }
}
}
