<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>$Title</title>
<% base_tag %>
</head>
<body class="$CSSClasses">

    $Form

    <h1>$Title</h1>
    $Content

    $StandAlone.PerfectCmsImageTag(standard).RAW

    <% loop $PerfectCMSImagesLoop %>
        <hr /><hr />
        <h2>$Title.RAW</h2>
        <hr />
        $Up.Image.PerfectCmsImageTag($key).RAW
        $Up.TallImage.PerfectCmsImageTag($key).RAW
        $Up.WideImage.PerfectCmsImageTag($key).RAW
        $Up.PNGImage.PerfectCmsImageTag($key).RAW
        <hr />
    <% end_loop %>

</body>
</html>
