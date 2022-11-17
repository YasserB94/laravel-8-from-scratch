
<span class="text-blue-500"
      x-data="{text:'Laravel',
      textArray:['Laravel'],
      textIndex:0,
      charIndex:0,
      typeSpeed:100,
      }"
      x-init="
      ()=>{
      let textLength = text.length;
      let i = setInterval(function (){
      let length = text.length
      let curr = $data.text = $data.textArray[$data.textIndex];
      $data.text = curr.substring(0,$data.charIndex);
      $data.charIndex++
      if($data.charIndex==textLength+1){
        clearInterval(i);
      }
      },$data.typeSpeed)}
      "
        x-text="text">
</span>
