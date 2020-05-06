# wp-teleg


install plugin
https://github.com/Teplitsa/TeploBot

setup
/start, /help, /s, /post
https://example.com/gwptb/service/?action=test_url
https://example.com/gwptb/service/?action=getme

create a file e.g. mytg.php

add filters

gwptb_supported_commnds_list -> add and remove commands

gwptb_post_draft_content
gwptb_post_draft_title -> modify the content in /post

#info

init:
core.php custom_query_vars()

recevie tg data
core.php custom_templates_redirect(), webhook_update_process()

