<?php
namespace NeutronStars\Events;

class Events
{
    /**
     * @var Events[]
     */
    private array $events = [];

    /**
     * <pre><code>
     * $instance->registers([
     *   ['name', 'Namespace\\Class#method'],
     *   ['name', 'Namespace\\Class#method']
     * ])
     * </code></pre>
     *
     * @param string[] ...$listeners
     * @return Events
     */
    public function registers(...$listeners): Events
    {
        foreach ($listeners as $listener) {
            $split = explode('#', $listener[1]);
            $this->register($listener[0], new $split[0](), $split[1]);
        }
        return $this;
    }

    public function register(string $name, Listener $listener, string $method, int $priority = Event::NORMAL_PRIORITY): Events
    {
        if (empty($this->events[$name])) {
            $this->events[$name] = [];
        }
        if (empty($this->events[$name][$priority])) {
            $this->events[$name][$priority] = [];
            ksort($this->events[$name]);
        }
        $this->events[$name][$priority][] = [
            'listener' => $listener,
            'method'   => $method
        ];
        return $this;
    }

    public function unregister(string ...$names): void
    {
        foreach ($names as $name) {
            unset($this->events[$name]);
        }
    }

    public function call(string $name, Event $event) {
        foreach ($this->events[$name] ?? [] as $priority) {
            foreach ($priority as $listener) {
                $method = $listener['method'];
                $listener['listener']->$method($event);
            }
        }
    }
}
