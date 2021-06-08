<?php


namespace App\Tests\Integration;


use App\Repository\UserRepository;
use App\Service\Import\ImportService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserImportTest extends KernelTestCase
{


    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    /**
     * @var \App\Repository\UserRepository
     */
    private $userRepository;

    private $importService;

    protected function setUp(): void
    {
        parent::setUp();
        $kernel = self::bootKernel();
        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $this->userRepository = self::$container->get(UserRepository::class);

        $this->importService = self::$container->get(ImportService::class);

    }


    protected function tearDown(): void
    {
        // Helper::clearTmpFile();

        // $this->userFixtures->load($this->entityManager);
        $this->entityManager->close();
        $this->entityManager = null;

        parent::tearDown();
    }

    public function testGameImport(): void
    {
        $message = $this->importService->importUserList($this->getJSON());
        self::assertSame($message, '');
    }


    private function getJSON():string
    {
        //$string = file_get_contents(__DIR__.'/../Fixtures/testData.json');
        return file_get_contents(__DIR__.'/../Fixtures/CalculationtestData.json');
    }


}