<?php
/**
 * @author      Laurent Jouanneau
 * @copyright   2009-2018 Laurent Jouanneau
 * @link        http://www.jelix.org
 * @licence     GNU Lesser General Public Licence see LICENCE file or http://www.gnu.org/licenses/lgpl.html
 */

class jtcpdfModuleConfigurator extends \Jelix\Installer\Module\Configurator {


    public function configure() {
        if (! $this->getConfigIni()->getValue('tcpdf', "responses")) {
            $this->getConfigIni()->setValue('tcpdf', "jtcpdf~jResponseTcpdf", "responses");
        }
        if (!$this->getConfigIni()->getValue('tcpdf', "_coreResponses")) {
            $this->getConfigIni()->setValue('tcpdf', "jtcpdf~jResponseTcpdf", "_coreResponses");
        }
    }


}
