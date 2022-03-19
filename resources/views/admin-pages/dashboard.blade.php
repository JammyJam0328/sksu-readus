@extends('layouts.admin')

@section('content')
    <x-admin.page title="Dashboard">
        <x-slot name="main">
            <livewire:admin.dashboard-details />
            <div class="mt-5 space-y-3">
                <h1 class="text-xl font-semibold text-gray-700">GENERATE REPORT</h1>
                <div class="flex space-x-2">
                    <a href="{{ route('report-post-per-campus') }}"
                        type="button"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-600 border border-transparent rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        <span class="mr-2">Total post per campus</span>
                    </a>
                    <a href="{{ route('report-post-per-day-months') }}"
                        type="button"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-600 border border-transparent rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        <span class="mr-2">Total post per day and Months</span>
                    </a>
                </div>
            </div>
        </x-slot>
    </x-admin.page>
    {{-- <div class="mt-2 space-y-2">
        <div class="sticky top-0 py-2 bg-gray-100 md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Dashboard</h2>
            </div>
        </div>
        <div class="pt-2 border-t">
            <livewire:admin.dashboard-details />
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit labore eligendi excepturi soluta, molestias
            corrupti! Earum sequi ea quae nulla natus in praesentium ut quibusdam repellendus quas debitis placeat aliquid
            cumque, cupiditate perspiciatis dolores? Architecto magni minus excepturi? Distinctio cupiditate tenetur
            corrupti quibusdam assumenda dolores doloribus rem fuga, molestias earum sunt animi placeat? Blanditiis, labore.
            Quo voluptate vel omnis perferendis nihil suscipit non aperiam rerum ipsum totam minima ratione sunt error,
            officiis mollitia deserunt, consectetur aliquid? Nemo, corrupti. Vitae quae omnis placeat magnam ad? Dignissimos
            voluptate ab impedit, ut eveniet est aspernatur sint repellendus cumque voluptatibus similique nostrum dolore
            quidem. Obcaecati tempore ducimus nisi vero aperiam at debitis consequuntur beatae fugiat. Impedit, doloribus
            eius tempore odit repellendus incidunt quasi enim ex quae, nam quia veritatis consequatur delectus, dolorum
            saepe modi? Magni, eveniet. Iure alias dolorem, pariatur facere tenetur dolorum delectus esse autem voluptate,
            repellendus sit deserunt accusamus neque omnis, necessitatibus error id quidem? Temporibus, accusamus
            repellendus dolore quos quia rerum impedit nulla placeat tempora hic laboriosam, earum qui dolor necessitatibus
            ipsum sunt. Nemo laborum perspiciatis minima nisi officia. Ut ipsam, aliquam veritatis assumenda facilis atque
            nostrum quod dignissimos qui pariatur, dolor amet velit nulla sunt repellendus, hic veniam id tenetur provident
            ab in ullam. Eos nihil expedita dignissimos a illo nostrum vel facere suscipit esse? Vel quidem veritatis
            explicabo corrupti molestias accusamus reprehenderit hic sapiente odio numquam totam ipsa magnam, soluta
            inventore iure placeat ipsum perspiciatis repellendus nesciunt amet. Beatae consequatur aliquid quidem magni
            neque incidunt provident, omnis sint at magnam ratione aspernatur modi? Rem modi iste repellat blanditiis
            doloremque earum dolorem nobis perspiciatis, animi, consequuntur laborum. Ad animi soluta praesentium,
            dignissimos excepturi assumenda nam consequuntur omnis necessitatibus minima accusamus aliquid. Ex molestiae
            ipsa recusandae ad incidunt eius necessitatibus totam maxime, voluptates nisi culpa veritatis similique in
            doloremque magni deserunt eos vitae explicabo velit tempora dolorem. Voluptatibus voluptas adipisci reiciendis
            iusto quas neque nemo, commodi vero excepturi veniam reprehenderit esse minus error porro repellendus odio
            officiis aliquid aspernatur delectus ratione? Ducimus possimus error rem quasi doloribus quo vel? Facere, atque?
            Repellendus cumque esse accusantium incidunt nobis sapiente iusto non dolore sit, eius, et magni quo natus
            eveniet totam magnam tempora ipsa quidem minima ex aspernatur recusandae atque nesciunt. Voluptatibus nam ipsa
            excepturi magnam nostrum beatae, itaque autem at quis, eum dolorum, doloribus culpa obcaecati maiores facilis
            voluptas. Repellendus assumenda aut obcaecati suscipit. Impedit, soluta sint aspernatur cupiditate asperiores
            autem, obcaecati molestiae ex esse minus incidunt harum blanditiis deleniti cum possimus dolores numquam
            dignissimos culpa laudantium. Quibusdam, excepturi architecto veritatis ad repudiandae consectetur cupiditate?
            Voluptas quibusdam mollitia, minus eius repellat, voluptatum amet magni explicabo doloribus iusto illum
            doloremque impedit vitae libero fugiat quos error autem velit commodi deleniti dignissimos, ipsum provident
            placeat esse. Voluptatum ullam aperiam, esse ducimus numquam vitae accusamus nobis consequatur commodi optio sed
            repellendus repellat nesciunt temporibus, necessitatibus inventore non, culpa tenetur! Laborum culpa excepturi
            officiis perferendis dolor quod animi voluptatibus, quibusdam, at pariatur nulla laboriosam adipisci? Vel
            repellat rerum hic temporibus odio iure, aliquam dicta aliquid necessitatibus non vero optio rem eaque sint
            nostrum reprehenderit nam libero minima consequatur ullam enim cumque esse eligendi harum. Accusantium in
            similique earum, vero harum debitis eum incidunt laborum rerum? Quia voluptatem atque a. Eaque fugiat architecto
            nobis vero, impedit fugit id autem itaque repudiandae deserunt repellat provident a harum minus? Possimus,
            recusandae soluta veniam nihil impedit atque perferendis cupiditate officiis delectus tenetur nesciunt!
            Accusantium quis rem sapiente, vel maiores autem quibusdam inventore numquam ullam omnis neque cumque aliquam
            dolores aspernatur similique ad fugit dolorum porro molestiae culpa voluptatibus cum eos reprehenderit. Ipsum
            vitae suscipit recusandae praesentium maxime distinctio voluptatibus officiis voluptates unde cupiditate beatae
            veritatis, culpa repellat nam. Adipisci dolorem nihil incidunt quasi tempore tempora odio nesciunt perspiciatis,
            minus a autem quisquam vel aliquid consectetur suscipit iure esse, quibusdam delectus provident quaerat tenetur,
            nulla repellendus. Dolor inventore voluptatibus incidunt eveniet veniam deserunt. Repellendus atque accusantium
            dolore ab, saepe facilis labore reprehenderit vero sit mollitia porro nihil totam consequatur vel, nisi aut.
            Quaerat, in distinctio. Ducimus quas eos tempore quo iure et sed, repellendus nostrum nesciunt recusandae rem
            obcaecati distinctio suscipit excepturi animi ex eligendi porro assumenda ipsa, saepe rerum. Nihil eum officiis
            debitis laboriosam sequi accusamus possimus corporis repudiandae laudantium rem facilis, suscipit amet
            temporibus iste praesentium quibusdam! Nostrum dolorem accusamus quas eligendi voluptatum libero laudantium
            temporibus reiciendis reprehenderit minima itaque, tempore incidunt? Facere cum possimus, incidunt aspernatur
            adipisci nisi officia exercitationem doloremque fuga iure pariatur culpa et animi, dolor at impedit magni
            molestiae. Quasi iusto facilis consectetur aspernatur! Autem voluptas consequatur neque aspernatur nulla. Minima
            quasi corrupti dolorem, eos totam nam repudiandae veniam ullam delectus voluptatum vitae sit voluptates modi,
            placeat, debitis recusandae rem. Eos reprehenderit saepe id accusamus error tenetur quidem sequi fugit
            necessitatibus eius, quos consequatur non ipsam consequuntur? Est ratione vel molestiae laboriosam commodi
            suscipit deleniti in ab cum explicabo sit iure ipsam odit, illo quis sunt distinctio modi quae repellat quia
            sapiente libero tempore facere. Repellendus est voluptates itaque illo corporis totam nulla, omnis praesentium,
            deserunt fugit, mollitia ea aspernatur similique dignissimos ad voluptas. Ab totam ducimus vel praesentium modi
            at molestiae ullam quam iusto, facilis nostrum commodi eveniet dicta, enim consequatur hic omnis non
            necessitatibus delectus beatae reprehenderit? Consectetur fugit exercitationem maxime earum aspernatur facere,
            sit, possimus corrupti ex distinctio quasi quaerat recusandae. Dolor, nam! Quo quam fuga velit, officia
            doloribus dignissimos quos sunt aperiam blanditiis delectus architecto minus distinctio. Laudantium incidunt
            sunt velit, vitae commodi, veniam officia odio suscipit nesciunt dolores consectetur, veritatis ut ullam. Alias
            commodi officia rerum! Saepe, molestiae at nostrum tempore iste nisi inventore, officia a facere minus voluptas
            illum repellat exercitationem pariatur repellendus cumque consequuntur nobis commodi velit, doloremque illo.
            Error similique, modi dolor laudantium quaerat perferendis dicta repellendus? Ut reiciendis placeat dicta eaque
            soluta est non harum quaerat, voluptates quidem assumenda laborum fuga culpa consectetur error beatae natus
            architecto provident odio voluptate mollitia. Eum, sequi. Id, esse eum est veritatis quaerat autem minima enim
            fuga quisquam! Voluptates, esse amet provident sed architecto facilis dolorem excepturi eum pariatur id.
        </div>
    </div> --}}
@endsection
