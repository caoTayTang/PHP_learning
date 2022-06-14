		// Input
		const ten = document.getElementById('ten');
		const gioi_tinh = document.getElementById('gioi_tinh');
		const dia_chi = document.getElementById('dia_chi');
		const email = document.getElementById('email');
		const password = document.getElementById('password');
		const re_password = document.getElementById('re_password');
		const so_thich = document.getElementById('so_thich');
		const ngay_sinh = document.getElementById('ngay_sinh');
		// Error span
		const error_span = document.getElementsByClassName('error_span');
		// Button
		const btn_reset = document.getElementsByClassName('reset action-button');
		const btn_submit = document.getElementsByClassName('submit action-button');
		// radio box
		const radio_nam = document.getElementsByClassName('radio_gioi_tinh')[0];
		const radio_nu = document.getElementsByClassName('radio_gioi_tinh')[1];

		//check name if its > 0 character and some regex
		function check_name()
		{
			//Họ tên: (chữ đầu viết hoa, cách nhau bởi 1 dấu cách, tên có thể có nhiều từ nhưng ít nhất phải là 2: Lê A for instace.)
			const regexName = /^[A-VXYỲỌÁẦẢẤỜỄÀẠẰỆẾÝỘẬỐŨỨĨÕÚỮỊỖÌỀỂẨỚẶÒÙỒỢÃỤỦÍỸẮẪỰỈỎỪỶỞÓÉỬỴẲẸÈẼỔẴẺỠƠÔƯĂÊÂĐ][a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]+(\s{1}[A-VXYỲỌÁẦẢẤỜỄÀẠẰỆẾÝỘẬỐŨỨĨÕÚỮỊỖÌỀỂẨỚẶÒÙỒỢÃỤỦÍỸẮẪỰỈỎỪỶỞÓÉỬỴẲẸÈẼỔẴẺỠƠÔƯĂÊÂĐ][a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]*)+$/; 

			return regexName.test(ten.value);
		}	

		function check_gioi_tinh()
		{
			if (radio_nam.checked == true || radio_nu.checked == true) 
			{
				return true;
			}else return false;
		}

		function check_email()
		{
			const regexEmail = /^\w+([\.-]?\w+)*\@\w+([\.-]?\w+)*(\.\w{2,3})+$/
			return regexEmail.test(email.value)
		}

		//At least 8 chars, 1 special num, 1 capital, 1 normal and no number required
		function check_password()
		{
			const regexPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/
			return regexPassword.test(password.value);
		}

		function check_so_thich()
		{
			if (!so_thich.value)
			{
				return false;
			}else
			{
				return true;	
			} 
		}


		function check_ngay_sinh()
		{
			var today = new Date();

			if(!ngay_sinh.value)
			{
				return false;
			}else if (today.toISOString().slice(0, 10) <= ngay_sinh.value)
			{
				return false;
			}else
			{
				return true;
			}
		}

		function reset_btn()
		{
			for (let i = 0; i < error_span.length ; i++ )
			{
				error_span[i].innerHTML = ''
			}
		}


		//validating form
		function validate()
		{
			for (let i = 0; i < error_span.length ; i++ )
			{
				error_span[i].innerHTML = ''
			}
			
			let isValid = true;

			if( !check_name() )
			{	
				error_span[0].innerHTML = "Tên không hợp lệ";
				isValid = false;
			} 

			if( !check_gioi_tinh() )
			{
				error_span[1].innerHTML = "Chưa check giới tính";
				isValid = false;
			} 

			if( !check_email() )
			{
				error_span[3].innerHTML = "Email không hợp lệ";
				isValid = false;
			}

			if( !check_password() )
			{
				error_span[4].innerHTML = "Password phải có ít nhất <br> 8 kí tự, có chữ in hoa, có kí tự đặt biệt";
				isValid = false;
			}

			if ( !check_ngay_sinh() )
			{
				error_span[5].innerHTML = "Ngày sinh không hợp lệ!";
				isValid = false;
			}

			if ( !check_so_thich() )
			{
				error_span[6].innerHTML = "Hãy chọn sở thích";
				isValid = false;
			}
			return isValid;
			

		}