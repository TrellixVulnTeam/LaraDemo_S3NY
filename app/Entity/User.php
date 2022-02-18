<?PHP
namespace App\Entity;

use Illuminate \Database\Eloquent\Model;

class User extends Model{

protected $table='users';

protected $promaryKey='id';

protected $fillable=[
		'name',
		'account',
		'password',
		'type',
		'sex',
		'height',
		'weight',
		'interest',
		'introduce',
		'picture',
		'enabled',
	  ];
}
?>
