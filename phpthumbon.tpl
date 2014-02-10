{assign var=param value=[
    "input" => $val.tvs.image.value
    ,"options" => "w=70&h=60"
]}
<img src='{$modx->runSnippet('phpthumbon',$param)}'/>
