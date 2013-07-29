Config Tooltip
=====================
If you need to know where a certain config setting is used in Magento code, you'll need to know the full path of that setting, as in the section/group/field key.

There are a couple of ways of doing this:
+ Look at the url to get the section name and run a `path like '<section>%'` query on the core_config_data table.
+ Use a command line tool like n98-magerun which has a `config:search` option to look through config labels and paths.

However, with this module, the path is mentioned directly after the value of a certain config setting in an unobtrusive way by using the `tooltip` config field setting.
