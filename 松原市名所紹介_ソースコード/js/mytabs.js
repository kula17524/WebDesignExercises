// カテゴリの絞り込み
function changeCategory(target_id){
  var categories, i;
  categories
    = document.getElementsByClassName('category');
  for(i = 0; i < categories.length; i++){
    var cat;
    cat = categories[i];
    if(cat.id == target_id){
      cat.className = "category show";
    }else{
      cat.className = "category hidden";
    }
  }
}

// カテゴリの絞り込み解除
function showAllCategory(){
  var categories, i;
  categories
    = document.getElementsByClassName('category');
  for(i = 0; i < categories.length; i++){
    var cat;
    cat = categories[i];
    if(cat.classList.contains('hidden')){
      cat.className = "category show";
    }
  }
}