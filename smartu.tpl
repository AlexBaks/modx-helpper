{snippet name=phpthumbon  params="input=`{$object.image}`&options=`&h=30`"}" height="30" alt="{$object.pagetitle}

{*runProcessor*}

{assign var=params value=[
        "where" => [
            "parent" => $modx->getOption('site_news_company')
        ]
    ,"limit" => 0
]}
                                            
{processor action="site/web/getdata" ns="modxsite" params=$params assign=result}

{foreach $result.object as $val}
{print_r($val)}
{/foreach}
