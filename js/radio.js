function radio(sId) {

    if (sId == 'grade4_img') {
      grade4.checked = true;
      grade4_img.style.border = '3px solid #F09609';
	  grade5_img.style.border = '3px solid #6f155f';
	  grade6_img.style.border = '3px solid #6f155f';
    }
	
    if (sId == 'grade5_img') {
      grade5.checked = true;
      grade4_img.style.border = '3px solid #6f155f';
	  grade5_img.style.border = '3px solid #F09609';
	  grade6_img.style.border = '3px solid #6f155f';
    }
	
    if (sId == 'grade6_img') {
      grade6.checked = true;
      grade4_img.style.border = '3px solid #6f155f';
	  grade5_img.style.border = '3px solid #6f155f';
	  grade6_img.style.border = '3px solid #F09609';
    }
}