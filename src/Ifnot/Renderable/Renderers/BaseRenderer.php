<?php namespace Ifnot\Renderable\Renderers;

/**
 * Class BaseRenderer
 * @package Ifnot\Renderable\Renderers
 */
class BaseRenderer {

    protected $entity;
    protected $attribute;

	protected $options = [
		'view' => [
            'show' => 'ifnot.renderable::renderer.attribute.html'
        ]
	];

    public function __construct($entity, $attribute, $options)
    {
        $this->entity = $entity;
        $this->attribute = $attribute;
    }

    public function get()
    {
        return $this->entity->{$this->attribute};
    }

	public function set($content)
	{
        $this->entity->{$this->attribute} = $content;
        $this->entity->save();
	}

    public function isEmpty()
    {
        return !isset($this->entity->{$this->attribute}) OR empty($this->entity->{$this->attribute});
    }

	public function __toString()
	{
		return $this->get();
	}
}