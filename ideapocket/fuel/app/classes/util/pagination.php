<?php

class Pagination extends Fuel\Core\Pagination
{

    /**
     * @var array The HTML for the display
     */
    public static $template = array(
        'wrapper_start'  => '<div class="pagination"><ul> ',
        'wrapper_end'    => ' </ul></div>',
        'page_start'     => '<li>',
        'page_end'       => '</li>',
        'previous_start' => '<li class="prev">',
        'active_previous_start' => '<li class="prev disabled">',
        'previous_end'   => '</li>',
        'previous_mark'  => '&laquo; ',
        'next_start'     => '<li class="next"> ',
        'active_next_start' => '<li class="next disabled">',
        'next_end'       => ' </li>',
        'next_mark'      => ' &raquo;',
        'active_start'   => '<li class="active"><a>',
        'active_end'     => '</a></li>',
    );

    /**
     * @var mixed   The pagination Parameter
     */
    protected static $pagination_param;

    /**
     * Creates the pagination links
     *
     * @access public
     * @return mixed    The pagination links
     */
    public static function create_links()
    {
        if (static::$total_pages == 1)
        {
            return '';
        }

        \Lang::load('pagination', true);

        $pagination  = static::$template['wrapper_start'];
        $pagination .= static::prev_link('');
        $pagination .= static::page_links();
        $pagination .= static::next_link('');
        $pagination .= static::$template['wrapper_end'];

        return $pagination;
    }

    // --------------------------------------------------------------------

    /**
     * Pagination Page Number links
     *
     * @access public
     * @return mixed    Markup for page number links
     */
    public static function page_links()
    {
        if (static::$total_pages == 1)
        {
            return '';
        }

        $pagination = '';

        // Let's get the starting page number, this is determined using num_links
        $start = ((static::$current_page - static::$num_links) > 0) ? static::$current_page - (static::$num_links - 1) : 1;

        // Let's get the ending page number
        $end   = ((static::$current_page + static::$num_links) < static::$total_pages) ? static::$current_page + static::$num_links : static::$total_pages;

        for($i = $start; $i <= $end; $i++)
        {
            if (static::$current_page == $i)
            {
                $pagination .= static::$template['active_start'].$i.static::$template['active_end'];
            }
            else
            {
                $url = ($i == 1) ? '' : '/'.$i;
                $pagination .= static::$template['page_start']
                                .\Html::anchor(rtrim(static::$pagination_url, '/').$url.static::$pagination_param, $i)
                                .static::$template['page_end'];
            }
        }
        return $pagination;
    }

    // --------------------------------------------------------------------

    /**
     * Pagination "Next" link
     *
     * @access public
     * @param string $value The text displayed in link
     * @return mixed    The next link
     */
    public static function next_link($value)
    {
        if (static::$total_pages == 1)
        {
            return '';
        }

        if (static::$current_page == static::$total_pages)
        {
            return static::$template['active_next_start']."<a>"
                .$value.static::$template['next_mark']
                ."</a>".static::$template['next_end'];
        }
        else
        {
            $next_page = static::$current_page + 1;
            return static::$template['next_start']
                .\Html::anchor(rtrim(static::$pagination_url, '/').'/'.$next_page.static::$pagination_param, $value.static::$template['next_mark'])
                .static::$template['next_end'];
        }
    }

    // --------------------------------------------------------------------

    /**
     * Pagination "Previous" link
     *
     * @access public
     * @param string $value The text displayed in link
     * @return mixed    The previous link
     */
    public static function prev_link($value)
    {
        if (static::$total_pages == 1)
        {
            return '';
        }

        if (static::$current_page == 1)
        {
            return static::$template['active_previous_start']."<a>"
                .static::$template['previous_mark'].$value
                ."</a>".static::$template['previous_end'];
        }
        else
        {
            $previous_page = static::$current_page - 1;
            $previous_page = ($previous_page == 1) ? '' : '/'.$previous_page;
            return static::$template['previous_start']
                .\Html::anchor(rtrim(static::$pagination_url, '/').$previous_page.static::$pagination_param, static::$template['previous_mark'].$value)
                .static::$template['previous_end'];
        }
    }
}