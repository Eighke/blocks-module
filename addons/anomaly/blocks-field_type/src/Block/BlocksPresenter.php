<?php namespace Anomaly\BlocksFieldType\Block;

use Anomaly\Streams\Platform\Entry\EntryPresenter;

use Anomaly\Streams\Platform\Support\Presenter;

/**
 * Class BlocksPresenter
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class BlocksPresenter extends Presenter
{

    /**
     * The decorated object.
     *
     * @var BlocksModel
     */
    protected $object;

    /**
     * Return the type of blocks.
     *
     * @return string
     */
    public function type()
    {
        return $this->object
            ->getEntry()
            ->getStreamSlug();
    }

    /**
     * Return the decorated entry.
     *
     * @return EntryPresenter
     */
    public function entry()
    {
        return decorate($this->object->entry);
    }

    /**
     * Catch calls to fields on
     * the page's related entry.
     *
     * @param  string $key
     * @return mixed
     */
    public function __get($key)
    {
        $entry = $this->object->getEntry();

        if ($entry && $entry->hasField($key)) {
            return decorate($entry)->{$key};
        }

        return parent::__get($key);
    }
}
