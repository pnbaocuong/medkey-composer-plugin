<?php
namespace app\composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

/**
 * Class ModulePlugin
 * @since 1.0
 * @author Dzhamal Tayibov <prohps@gmail.com>
 */
class ComponentPlugin implements PluginInterface
{
    protected $composer;
    protected $io;

    /**
     * {@inheritdoc}
     */
    public function activate(Composer $composer, IOInterface $io)
    {
        $this->composer = $composer;
        $this->io = $io;
        $installer = new ComponentInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }

    public function deactivate(Composer $composer, IOInterface $io)
    {
        // Code vô hiệu hóa plugin (nếu cần)
        // Nếu không cần, để trống
        $composer->getInstallationManager()->removeInstaller($this->installer);
    }

    public function uninstall(Composer $composer, IOInterface $io)
    {
        // Code gỡ bỏ plugin (nếu cần)
        // Nếu không cần, để trống
        $composer->getInstallationManager()->removeInstaller($this->installer);
    }
}
