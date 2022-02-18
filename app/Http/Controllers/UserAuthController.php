<?PHP
namespace App\Http\Controllers;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Http\Controllers\Controller;
use App\Models\ShareData;
use App\Entity\User;
use Illuminate\Http\Request;
use Validator;
use Hash;
class UserAuthController extends Controller
{
	public function signUpPage()
	{
	    $name = 'sign_up';
	    $binding = [
	    'title' => ShareData::TITLE,
	    'name' => $name,
	    ];
	    return view('user.sign-up', $binding);
	}

	public function uploadPage()
	{
	    $name = 'upload';
	    $binding = [
		   	'title' => ShareData::TITLE,
			'name' => $name,
	    ];
	    return view('user.upload',$binding);
	}

	public function signUpProcess()
	{
		$input = request()->all();
		$rules = [
			  'name' => [
				    'required',
				    'max:50',
			  ],
			  'account'=>[
				  'required',
				  'max:50',
				  'email',
			  ],
			  'password'=>[
				  'required',
				  'min:5',
			  ],
			  'password_confirm'=>[
				  'required',
				  'same:password',
				  'min:5'
			  ],
		];

		$validator=Validator::make($input,$rules);

		if($validator->fails())
		{
			//資料驗證錯誤
			return redirect('/user/auth/sign-up')->withErrors($validator)->withInput();
		}
		$input['password'] = Hash::make($input['password']);
	 	User::create($input);
		var_dump($input);		
		exit;

	}

	public  function upload(Request $request){
	
		if($request->isMethod('POST')){
			 $file = $request->file('source');
			  if($file->isValid()){
				  $originalName= $file->getClientOriginalName();
    				  $ext= $file->getClientOriginalExtension();
	 	                  $type= $file->getClientMimeType();
				  $realPath = $file->getRealPath();
				  #$fileName = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;
				  $fileName = "Input.".$ext;
       			          $bool=  \Storage::disk('uploads')->put($fileName,file_get_contents($realPath));
				  $output_data = system('python3.9 ../test.py 2>&1 1> /dev/null');
				  #$output_data="w";
				  #var_dump($output_data);
				  return response()->download('/var/www/storage/app/public/output.xlsx');
			  }
			 exit;
		}
	}

	
}
?>
