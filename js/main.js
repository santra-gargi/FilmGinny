const nav_button = document.querySelector('.nav_button');
const menu=document.querySelector('.menu');
let nav_buttonopen = false;
nav_button.addEventListener('click', () => {
	if (!nav_buttonopen) {
		nav_button.classList.add('open');
		menu.classList.add('active');
		nav_buttonopen = true;
	} else {
		nav_button.classList.remove('open');
		menu.classList.remove('active');
		nav_buttonopen = false;
	}
})

// const form = document.querySelector("form"),
// fileInput = document.querySelector(".file-input"),
// progressArea = document.querySelector(".progress-area"),
// uploadedArea = document.querySelector(".uploaded-area");

// form.addEventListener("click", () =>{
//   fileInput.click();
// });

// fileInput.onchange = ({target})=>{
//   let file = target.files[0];
//   if(file){
//     let fileName = file.name;
//     if(fileName.length >= 12){
//       let splitName = fileName.split('.');
//       fileName = splitName[0].substring(0, 13) + "... ." + splitName[1];
//     }
//     uploadFile(fileName);
//   }
// }

	// const dialog_container=document.getElementById('dialog_container');
	// const close=document.getElementById('close');

	// close.addEventListener('click' , () => {
	// dialog_container.classList.add('close');
	// })