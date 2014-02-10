{assign var=img value="assets/images/`$val.tvs.image.value`"}
                {assign var=param value=[
                    "input" => $img
                    ,"options" => "w=70&h=60"
                ]}
<img src='{$modx->runSnippet('phpthumbon',$param)}'/>
