<?php

namespace PhpLite\View;


class View
{
    public static function make($view, $params = [])
    {
        $baseContent = self::getBaseContent();

        $viewContent = self::getMainContent($view, false, $params);

        echo str_replace('{{content}}', $viewContent, $baseContent);

    }

    protected static function getBaseContent()
    {
        ob_start();
        include base_path().'views/layouts/main.php';

        return ob_get_clean();

    }

    public static function makeError($error){
        self::getMainContent($error, true);
    }

    protected static function getMainContent($view, $isError = false, $params = [])
    {
        // if any error exists return 404 error view
        // 404 handling
        $path = $isError ? views_path() . 'errors/' : views_path();

        // handling views
        if(str_contains($view, '.')){ // check if is contains . that means directory

            $views = explode('.', $view); // explode view path with .
            // loop throw the view string
            // for example if the view in directory like users.index
            // loop and return the last element of the array and makes it as the view
            // in this example returns  index.php as the view => it's the last element
            foreach ($views as $view) {
                if(is_dir($path .$view))
                {
                    $path = $path . $view . '/';
                }
            }

            // concatenate the path of the view and .php
            $view = $path . end($views) . '.php';


        }else{
            // if the returned view string doesn't contain .
            $view = $path . $view . '.php';
        }

        foreach ($params as $param => $value) {
            $$param = $value;
        }


        // buffering the view content if not error
        if ($isError){
            include $view;
        }else{
            ob_start();
            include $view;
            return ob_get_clean();
        }
    }
}