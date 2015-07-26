<?php
class user_controller
{
public function	getsignup()
	{
		require('signup.html');
	}
public function	getlogin()
	{
		require('login.html');
	}
public function	postsignup($data)
	{
		$user = new users('mvc','user');
		$result = $user->where('roll','=',$data["roll"]);
		$row = $result->fetch_assoc();
		if($row!==null)
		{
			echo 'user registered already';
			exit;
		}
		else
		{
			$user->name = $data["name"];
			$user->roll = $data["roll"];
			$user->save();
			echo 'user registered successfully';
		}
	}
public function	postlogin($data)
	{
		$user = new users('mvc','user');
		$result = $user->where('roll','=',$data["roll"]);
		$row = $result->fetch_assoc();
		if($row!==null)
		{
			if(strcmp($data["password"],$row["password"])==0)
				echo "welcome  ",$row['name'];
			else
				echo "incorrect password";
			
		}
		else
		{
			echo 'user not registered';
		}
	}
}
?>