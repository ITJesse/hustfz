window.onload=function(){
    var label_grade=document.getElementById('label_grade');
    var label_name=document.getElementById('label_name');
	var label_class=document.getElementById('label_class');
	var label_goodat=document.getElementById('label_goodat');
	var grade4=document.getElementById('grade4');
	var grade5=document.getElementById('grade5');
	var grade6=document.getElementById('grade6');
	var grade4_img=document.getElementById('grade4_img');
	var grade5_img=document.getElementById('grade5_img');
	var grade6_img=document.getElementById('grade6_img');
	var name=document.getElementById('name');
	var class1=document.getElementById('class1');
	var goodat=document.getElementById('goodat');
	label_grade.onclick=function(){
		label_grade.className='active';
		label_name.className='';
		label_class.className='';
		label_goodat.className='';
	}
	label_name.onclick=function(){
		label_grade.className='';
		label_name.className='active';
		label_class.className='';
		label_goodat.className='';
	}
	label_class.onclick=function(){
		label_grade.className='';
		label_name.className='';
		label_class.className='active';
		label_goodat.className='';
	}
	label_goodat.onclick=function(){
		label_grade.className='';
		label_name.className='';
		label_class.className='';
		label_goodat.className='active';
	}
	grade4_img.onclick=function(){
		grade4.checked = true;
		grade4_img.style.border = '2px solid #F09609';
		grade5_img.style.border = '2px solid #1BA1E2';
		grade6_img.style.border = '2px solid #1BA1E2';
		label_grade.className='active';
		label_name.className='';
		label_class.className='';
		label_goodat.className='';
	}
	grade5_img.onclick=function(){
		grade5.checked = true;
		grade4_img.style.border = '2px solid #1BA1E2';
		grade5_img.style.border = '2px solid #F09609';
		grade6_img.style.border = '2px solid #1BA1E2';
		label_grade.className='active';
		label_name.className='';
		label_class.className='';
		label_goodat.className='';
	}
	grade6_img.onclick=function(){
		grade6.checked = true;
		grade4_img.style.border = '2px solid #1BA1E2';
		grade5_img.style.border = '2px solid #1BA1E2';
		grade6_img.style.border = '2px solid #F09609';
		label_grade.className='active';
		label_name.className='';
		label_class.className='';
		label_goodat.className='';
	}
	name.onclick=function(){
		label_grade.className='';
		label_name.className='active';
		label_class.className='';
		label_goodat.className='';
	}
	class1.onclick=function(){
		label_grade.className='';
		label_name.className='';
		label_class.className='active';
		label_goodat.className='';
	}
	goodat.onclick=function(){
		label_grade.className='';
		label_name.className='';
		label_class.className='';
		label_goodat.className='active';
	}
}
